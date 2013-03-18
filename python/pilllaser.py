import RPi.GPIO as GPIO
from datetime import datetime
now = datetime.now()
timething = str(now.year)+str(now.month)+"0"+str(now.day)+str(now.hour)+str(now.minute)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(17,GPIO.IN)
input = GPIO.input(17)
f = open('test.txt', 'a')
if input == False:
    f.write("01"+"01"+timething + "\n")
elif input == True:
    f.write("01"+"01"+timething+"\n")
else:
    print('Error')
f.close()
