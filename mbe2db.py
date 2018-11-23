#!/usr/bin/env python
# Sensor libs
import smbus2
import bme280

# MySQL
import MySQLdb
host="localhost"
user="test"
passwd="test"
db="test"
sensor="BME280-1"

conn = MySQLdb.connect(host, user, passwd, db)
x = conn.cursor()

port = 1
address = 0x76
bus = smbus2.SMBus(port)

calibration_params = bme280.load_calibration_params(bus, address)

# the sample method will take a single reading and return a
# compensated_reading object
data = bme280.sample(bus, address, calibration_params)

#writing the values to the db
try:
    x.execute("""INSERT INTO Sensor (sensor, temperatur, humidity, pressure) VALUES (%s,%s,%s,%s)""",(sensor,data.temperature,data.humidity,data.pressure))
    conn.commit()
except:
    conn.rollback()

conn.close()
