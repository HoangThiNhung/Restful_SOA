##Resful API##
-sql: tạo database soa và import file sql trong thư mục sql:
-trang admin: Restful_API/admin
#tài khoản admin: nhunght@smartosc.com
#mật khẩu: 123456
#Book management: list book: cung cấp API của các loại sách dưới dạng Json
##lấy json của 1 quển sách: link: Resful_API/admin/books/id (id = 1,2, 3, ...)
## Restful resource controller:
###verb: GET		path: admin/books					action: index		route name: books.index  // list book
###verb: GET 		path: admin/books/create			action: create		route name: books.create
###verb: POST		path: admin/books					action: store		route name: books.store
###verb: GET		path: admin/books/{id}				action: show 		route name: books.show
###verb: GET		path: admin/books/{id}/edit			action: edit		route name: books.edit
###verb: PUT/PATCH	path: admin/books/{id}				action: update 		route name: books.update
###verb: DELETE		path: admin/books/{id}				action: destroy 	route name: books.destroy

##BookController: thư mục app/Http/Controller/BookController.php
## restful route: thư mục app/Http/routes.php