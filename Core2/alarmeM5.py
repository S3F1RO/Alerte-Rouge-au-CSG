from m5stack import *
import socket
import time
import network

alarm_active = False
siren_step = 0
last_siren_time = 0

# Connect to the WIFI
SSID="XXXXX"
PASSWORD="XXXXX"
wlan = network.WLAN(network.STA_IF)
wlan.active(True)
wlan.connect(SSID, PASSWORD)
ip = wlan.ifconfig()[0]

lcd.clear()
# ------------------------------------------------------
# Non-blocking siren tick
# ------------------------------------------------------
def alarm_tick():
    global siren_step, last_siren_time, alarm_active

    if not alarm_active:
        ##speaker.stop()
        siren_step = 0
        return

    now = time.ticks_ms()

    # Step 1 → 800 Hz
    if siren_step == 0:
        speaker.sing(800,0.8)    # <<< SAFE ON FIRE
        siren_step = 1
        last_siren_time = now
        rgb.setColorAll(0xFF0000)


    # Step 2 → 1200 Hz
    elif siren_step == 1 and time.ticks_diff(now, last_siren_time) > 150:
        speaker.sing(1200,0.8)   # <<< SAFE ON FIRE
        siren_step = 0
        last_siren_time = now
        rgb.setColorAll(0x000000)


        
# ------------------------------------------------------
# Trigger from any source
# ------------------------------------------------------
def start_alarm():
    lcd.clear()
    global alarm_active
    alarm_active = True
    lcd.print("ALARMEEEEEE !!!",80,100)
    lcd.print("Trouvez le Badge du Directeur !",0,140)
    print("Alarm TRIGGERED")

def stop_alarm():
    lcd.clear()
    global alarm_active 
    alarm_active = False
    #speaker.stop()
    lcd.print("ALARME DESACTIVEE",50,110)
    rgb.setColorAll(0x00FF00)
    print("Alarm STOPPED")

# ------------------------------------------------------
# Display IP adress
# ------------------------------------------------------

lcd.print("\nConnected!",80,80)
lcd.print("IP address:" + wlan.ifconfig()[0],0,120)
time.sleep(5)
rgb.setColorAll(0x0000FF)
lcd.clear()
# ------------------------------------------------------
# TCP server setup
# ------------------------------------------------------
serveur = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
serveur.bind(('', 1200))
serveur.listen(1)
serveur.settimeout(0.1)
client = None
print("TCP Ready on port 1200")
print(ip)
# ------------------------------------------------------
# MAIN LOOP
# ------------------------------------------------------
while True:
    # ----------------- NON-BLOCKING SIREN -------------
    alarm_tick()
    # ----------------- TCP ACCEPT ---------------------
    try:
        if client is None:
            client, addr = serveur.accept()
            client.settimeout(0.1)
            print("Client connected:", addr)
    except OSError:
        pass

    # ----------------- TCP RECEIVE --------------------
    if client:
        try:
            data = client.recv(1024)
            if data:
                msg = data.decode().strip()
                print("TCP >", msg)

                if msg == "ALARM_ON":
                    start_alarm()

                if msg == "ALARM_OFF":
                    stop_alarm()

        except OSError:
            pass

        # Disconnect test
        try:
            client.send(b"")
        except OSError:
            print("TCP client disconnected")
            client.close()
            client = None

    time.sleep_ms(20)
