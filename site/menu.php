$query = 'SELECT items.name      as iname,
                 categories.id   as ccode,
                 categories.name as cname,

                 
             FROM items
             Join categories on items.category = category.id
             
             ORDER BY categories.id ASC';