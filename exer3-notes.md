# Required functionalities

- [ ] Revamp products page
  - [ ] is auto generated based on the "products" table in MariaDB/MySQL
  - [ ] pressing on the product category header reloads the page to only show products in the category that was clicked
  - [ ] Add to cart functionality for product listings
    - uses cookies
    - pressing the "buy now" button stores the item and its quantity to an array, and the array is serialized and stored in a cookie
- [ ] Cart page
  - Utilizes multi-dimensional array and cookies
  - [ ] picture -> description -> name -> quantity -> price -> "delete" button
    - [ ] pressing the delete button for a given product removes it entirely from the cart (and the list/array in the cookie)
    - very unsure (bruh)
  - [ ] has "place order" button
    - functionality is not yet required
      - again, quite unsure
