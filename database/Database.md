# Database

This is where you will place information about your database:
- Structure
- SQL dump
- etc.

### 08/08/24

working on the adding items to database function

originally, when i tried to add an item to the database, i was shown an 'undefined array key' error on line 11 of add-item.php
![item adding error](images/item-adding-error.png)

### 12/08/24

working on the function to add categories to the database. when i enter this information:
![entering category info](images/entering-category-info.png)

this error shows up;
![error adding category](images/error-adding-category.png)

this can be fixed by removing one of the question marks on line 20:
![fixing category add error](images/fixing-category-add-error.png)

now the category is added sucsessfully
![category add works](images/category-add-works.png)