const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
const toggleForm = document.getElementById("toggle-create");
const createForm = document.querySelector(".forms-wrapper");
const updateForm = document.querySelector(".uforms-wrapper");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
}

const navLink = document.querySelectorAll(".nav-link");
navLink.forEach((n) => n.addEventListener("click", closeMenu));

function closeMenu() {
  hamburger.classList.remove("active");
  navMenu.classList.remove("active");
}

function togglForm() {
  createForm.classList.toggle("active-form");
}
function utogglForm() {
  updateForm.classList.toggle("active-form");
}

toggleForm.addEventListener("click", togglForm);

const handleDelete = (e) => {
  let button = e.target;
  const prodID = button.dataset.id;

  $.ajax({
    type: "POST",
    url: "api.php",
    data: {
      request: "delete_product",
      productId: prodID,
    },
    success: function (response) {
      if (response.success) {
        fetchProducts();
      }
    },
  });
};

const fetchProduct = (id) => {
  let product;
  $.ajax({
    type: "GET",
    url: `api.php?action=get-product&id=${id}`,
    success: function (response) {
      product = response.results[0];
      $("#uname").val(product.product_name);
      $("#udesc").val(product.description);
      $("#uimage").val(product.image_url);
      $("#uprice").val(product.price);
      $("<input>", {
        type: "hidden",
        id: "id",
        name: "id",
        value: id,
      }).appendTo("#update-form");
      utogglForm();
    },
  });
};

const applyUpdate = (e) => {
  e.preventDefault();
  const request = {
    productId: Number($("#id").val()),
    name: $("#uname").val(),
    desc: $("#udesc").val(),
    image: $("#uimage").val(),
    price: $("#uprice").val(),
  };
  $.ajax({
    type: "POST",
    url: "api.php",
    data: {
      request: "update_product",
      ...request,
    },
    success: function (response) {
      fetchProducts();
    },
  });
};

const handleUpdate = (e) => {
  let button = e.target;
  const prodID = button.dataset.id;
  fetchProduct(prodID);
  const updateButton = document.getElementById("update");
  updateButton.addEventListener("click", applyUpdate);
};

function renderProducts(products) {
  const productDisplay = document.querySelector(".product-wrapper");
  productDisplay.innerHTML = "";
  products.forEach((prod) => {
    productElement = `
            <div class="product-card">
                <div class="product-actions">
                    <button id="update-product" class="btn-upd" data-id="${prod.product_id}">Updte</button>
                    <button id="delete-product" class="btn-del" data-id="${prod.product_id}">Delete</button>
                </div>
                <img src="${prod.image_url}" alt="">
                <div class="product-info">
                    <h2 class="product-title">${prod.product_name}</h2>
                    <span>Price: $${prod.price}</span>
                </div>
            </div>
        `;
    productDisplay.innerHTML += productElement;
  });

  const deleteButtons = document.querySelectorAll(".btn-del");
  const updateButtons = document.querySelectorAll(".btn-upd");
  deleteButtons.forEach((button) =>
    button.addEventListener("click", handleDelete)
  );
  updateButtons.forEach((button) =>
    button.addEventListener("click", handleUpdate)
  );
}

function fetchProducts() {
  fetch("./api.php?action=get-all-products", {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => renderProducts(data.results))
    .catch((err) => console.error(err));
}

window.addEventListener("load", fetchProducts());

const createProduct = document.getElementById("create-product");
createProduct.addEventListener("click", (e) => {
  e.preventDefault();
  const request = {
    name: $("#name").val(),
    desc: $("#desc").val(),
    image: $("#image").val(),
    price: $("#price").val(),
  };

  $.ajax({
    type: "POST",
    url: "api.php",
    data: {
      request: "create_product",
      ...request,
    },
    success: function (response) {
      if (response.success) {
        fetchProducts();
        createForm.classList.remove("active-form");
      }
    },
  });
});
