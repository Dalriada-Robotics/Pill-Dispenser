from datetime import datetime
now = datetime.now()
timething = str(now.year)+str(now.month)+"0"+str(now.day)+str(now.hour)+str(now.minute)
f = open('config.txt', 'r')
data = f.readline()
f.close()
print(data)
consoleoutput = str(now.date) + ":" + str(now.time)
f = open('test.txt', 'a')
if data == "1":
    f.write("01"+"01"+timething + "\n")
elif data == "2":
    f.write("01"+"01"+timething+"\n")
else:
    print("There has been an error")
f.close()
print('File closed')
