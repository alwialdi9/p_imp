import socket, select

def send_to_all(sock, message):

    for socket in connected_list:
        if socket != server_socket and socket != sock:
            try:
                socket.send(message)
            except:

                socket.close()
                connected_list.remove(socket)


if __name__ == "__main__":
    name = ""

    record = {}

    connected_list = []
    buffer = 2020
    port = 3308


    server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

    server_socket.bind(("localhost", port))
    server_socket.listen(20)
    connected_list.append(server_socket)

    print("\t\t\t\tBERHASIL")

    while 1:

        rList, wList, error_sockets = select.select(connected_list, [], [])

        for sock in rList:

            if sock == server_socket:

                sockfd, addr = server_socket.accept()
                name = sockfd.recv(buffer)
                connected_list.append(sockfd)
                record[addr] = ""

                if name in record.values():
                    sockfd.send(bytes("\r Username already taken!\n"))
                    del record[addr]
                    connected_list.remove(sockfd)
                    sockfd.close()
                    continue
                else:

                    record[addr] = name
                    print("Client (%s, %s) connected", addr, " [", record[addr], "]")
                    sockfd.send(("\r Welcome to chat room. Enter 'tata' anytime to exit\n").encode())
                    name = name.decode()
                    send_to_all(sockfd, "\r " + name + " joined the conversation \n")


            else:

                try:
                    data1 = sock.recv(buffer)

                    data = data1[:data1.index("\n")]

                    i, p = sock.getpeername()
                    if data == "tata":
                        msg = "\r\33[1m" + "\33[31m " + record[(i, p)] + " left the conversation \33[0m\n"
                        send_to_all(sock, msg)
                        print("Client (%s, %s) is offline" % (i, p), " [", record[(i, p)], "]")
                        del record[(i, p)]
                        connected_list.remove(sock)
                        sock.close()
                        continue

                    else:
                        msg = "\r\33[1m" + "\33[35m " + record[(i, p)] + ": " + "\33[0m" + data + "\n"
                        send_to_all(sock, msg)


                except:
                    (i, p) = sock.getpeername()
                    send_to_all(sock,
                                "\r\33[31m \33[1m" + record[(i, p)] + " left the conversation unexpectedly\33[0m\n")
                    print("Client (%s, %s) is offline (error)" % (i, p), " [", record[(i, p)], "]\n")
                    del record[(i, p)]
                    connected_list.remove(sock)
                    sock.close()
                    continue

server_socket.close()
