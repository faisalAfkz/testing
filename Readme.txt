How to run:
--------------------------------------
Upload the sql in database
Keep FrontEnd file in C:\xampp\htdocs location
Run your xampp. Go to browser and input this url http://localhost:8080/frontend/ 
if it doesnt work try http://localhost/frontend/ 


Features:
--------------------------------------
Our project has 2 user inteface. One for the employee login and another for the customer login.

Employee login Features:
	
	Customers: 
		   * View all customers accountId and customerID
		   * Find customer details using customerId
		   * Find customer account details using customerId
		   * Edit customer account information 
				-> Edit customer details
				-> Change account type 
				-> Delete customer account

	New Customer Account:
		   *Create a new customer account

	Manager:(Only manager privilege)
		   *Create or edit Employee information
		   *Customize Interest Rates

	Transaction Log:(Only manager privilege)
		   *Search for transaction details 
		   *Carry out a transaction(Deposit,Withdraw,Loan)

Customer login Features:

	Customer can see their account balance,type,status and other information of their account.
