ver cita, pasa href con el parametro que quieres mostrar hacia pago 
if pago va ser igual solo s viene de esat pantalla
Nunca va a ver el boton pagar en ReservarCita si vienes de Tabla cita

podemos hacer dos enlaces 1.que pueda ver y el 2.que pueda ir a pagar


Hacer un SELECT * FROM CITAS WHERE ID_Cliente=$_SESSION[ID_Cliente]
