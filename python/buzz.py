import RPi.GPIO as GPIO
from time import sleep
GPIO.setmode(GPIO.BOARD)
GPIO.setup(24,GPIO.OUT)
GPIO.setup(23,GPIO.OUT)
GPIO.output(24,True)
sleep(0.2)
GPIO.output(24,False)
sleep(0.2)
GPIO.output(24,True)
sleep(0.2)
GPIO.output(24,False)
GPIO.cleanup()
