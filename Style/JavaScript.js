// JavaScript Document

	function updateCategory(id)
	{
		window.location = "index.php?page=updateCategory&id="+ id;
	
	}
	
	function deleteCategory(id)
	{
		result = confirm("Yakin?");
		if(result){
		window.location = "ViewOld/deleteCategory.php?id="+ id;
		}
		
	}
	
	function updateBook(isbn)
	{
		window.location = "index.php?page=updateBook&isbn="+ isbn;
		
	}
	function deleteBook(_isbn)
	{
		result = confirm("Yakin?");
		if(result){
		window.location = "ViewOld/deleteBook.php?isbn="+ _isbn;
		}
		
	}
