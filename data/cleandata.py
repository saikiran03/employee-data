import csv

class Employee:

	def __init__(self, name, fname, empid, dept, deptcode, pan, adhar, mobile, dob, bankname, acno, branch, ifsc, dno, flatno, street, area, post, city, pin):
		self.name = name
		self.fname = fname
		self.empid = empid
		self.dept = dept
		self.deptcode = deptcode
		self.pan = "".join(pan.split())
		self.adhar = ''.join(adhar.split())
		self.mobile = ''.join(mobile.split())
		self.dob = dob
		self.bankname = bankname
		self.acno = "".join(acno.split())
		self.branch = branch
		self.ifsc = ifsc
		self.dno = dno
		self.flatno = flatno
		self.street = street
		self.area = area
		self.post = post
		self.city = city
		self.pin = pin
		return
	
	def __repr__(self):
		return self.dob


outputFile = open("clean.csv", 'wb')
writer = csv.writer(outputFile, delimiter = ",")
with open("data.csv", 'r') as csvfile:
	fileReader = csv.reader(csvfile)
	titles = fileReader.next()
	writer.writerow(titles)

	while True:
		try:
			data = fileReader.next()
			employee = Employee(*data)

			writer.writerow(vars(employee).values())
			print vars(employee)
			print ""
		except:
			break