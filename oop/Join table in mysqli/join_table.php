Here tbl_post and tbl_category is a table name.


$query = "SELECT tbl_post.*, tbl_category.name FROM Tbl_post INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id ORDER BY tbl_post.title DESC ";
