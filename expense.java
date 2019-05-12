Expenseitems expenseItem = new Expenseitems();
     
// Set the values
expenseItem.setExpname(inputExpenseName.getText().toString());
expenseItem.setExpamount(Double.valueOf(inputExpenseAmount.getText().toString()));
expenseItem.setCompleted(1);
expenseItem.setCreatedon(nowInt);
     
// Call the Expense DAO to insert the record
ExpenseitemsDao.insertRecord(expenseItem);
