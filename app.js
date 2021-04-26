// youtube source that helped me create my cart
//https://www.youtube.com/watch?v=023Psne_-_4&t=13151s&ab_channel=freeCodeCamp.org

// Declare variables

const cartBtn = document.querySelector('.cart-btn');
const checkoutBtn = document.getElementById('checkout-btn');
const closeCartBtn = document.querySelector('.close-cart');
const clearCartBtn = document.querySelector('.clear-cart');
const cartDOM = document.querySelector('.cart');
const cartOverlay = document.querySelector('.cart-overlay');
const cartItems = document.querySelector('.cart-items');
const cartTotal = document.querySelector('.cart-total');
const cartContent = document.querySelector('.cart-content');
const productsDOM = document.querySelector('.products-center');

// this is the main cart
let cart = [];

//buttons
let buttonsDOM = [];

// getting the products
class Products {
  async getProducts() {
    try {
      // get products from json file
      let result = await fetch('../uploads/documents/books.json');
      let data = await result.json();
      let products = data;
      // extract the data needed from the json
      products = products.map((item) => {
        const title = item.title;
        const id = item.id;
        const image = item.image;
        const price = item.price;
        return { title, price, id, image };
      });
      return products;
    } catch (error) {
      console.log(error);
    }
  } // end of getProducts
} // end of Products class

// display products
class UI {
  // render the products to the shop page
  displayProducts(products) {
    let result = '';
    products.forEach((product) => {
      result += `
        <!-- single product -->
        <article class="product">
            <div class="img-container">
                <img src=${product.image} alt="product" class="product-img">
                <button class="bag-btn" data-id=${product.id}>
                    <i class="fas fa-shopping-cart"></i>
                    add to cart
                </button>
            </div>
            <h3>${product.title}</h3>
            <h4>$${product.price}</h4>
        </article>
        <!-- end of single product -->
        `;
    });
    productsDOM.innerHTML = result;
  } // end of displayProducts

  getBagButtons() {
    // create an array of all of the bag buttons
    const buttons = [...document.querySelectorAll('.bag-btn')];
    buttonsDOM = buttons;
    buttons.forEach((button) => {
      let id = button.dataset.id;
      let inCart = cart.find((item) => item.id === id);
      if (inCart) {
        button.innerText = 'In Cart';
        button.disabled = true;
      }
      button.addEventListener('click', (event) => {
        event.target.innerText = 'In Cart';
        event.target.disabled = true;
        // get product from products based on the id
        let cartItem = { ...Storage.getProduct(id), amount: 1 };
        // add product to the cart
        cart = [...cart, cartItem];
        // save the cart in the local storage
        Storage.saveCart(cart);
        // set cart values
        this.setCartValues(cart);
        // display cart item
        this.addCartItem(cartItem);
        // show the cart
        //this.showCart();
      }); // end of click event listener
    });
  } // end of getBagButtons

  setCartValues(cart) {
    let tempTotal = 0;
    let itemsTotal = 0;
    cart.map((item) => {
      tempTotal += item.price * item.amount;
      itemsTotal += item.amount;
    });
    cartTotal.innerText = parseFloat(tempTotal.toFixed(2));
    cartItems.innerText = itemsTotal;
  } // end of setCartValues
  addCartItem(item) {
    const div = document.createElement('div');
    div.classList.add('cart-item');
    div.innerHTML = `
                <img src=${item.image} alt="product">
                <div>
                    <h4>${item.title}</h4>
                    <h5>$${item.price}</h5>
                    <span class="remove-item" data-id=${item.id}>remove</span>
                </div>
                <div>
                    <i class="fas fa-chevron-up" data-id=${item.id}></i>
                    <p class="item-amount">${item.amount}</p>
                    <i class="fas fa-chevron-down" data-id=${item.id}></i>
                </div>
                `;
    // add the item to the cart
    cartContent.appendChild(div);
  } // end of addCartItem
  showCart() {
    cartOverlay.classList.add('transparentBcg');
    cartDOM.classList.add('showCart');
  } // end of showCart
  setupApp() {
    cart = Storage.getCart();
    this.setCartValues(cart);
    this.populateCart(cart);
    cartBtn.addEventListener('click', this.showCart);
    closeCartBtn.addEventListener('click', this.hideCart);
  } // end of setupApp
  populateCart(cart) {
    cart.forEach((item) => this.addCartItem(item));
  } // end of populateCart

  hideCart() {
    cartOverlay.classList.remove('transparentBcg');
    cartDOM.classList.remove('showCart');
  } // end of hideCart

  cartLogic() {
    // clear cart button
    clearCartBtn.addEventListener('click', () => {
      this.clearCart();
    });
    // cart functionality
    cartContent.addEventListener('click', (event) => {
      if (event.target.classList.contains('remove-item')) {
        let removeItem = event.target;
        let id = removeItem.dataset.id;
        cartContent.removeChild(removeItem.parentElement.parentElement);
        this.removeItem(id);
      } else if (event.target.classList.contains('fa-chevron-up')) {
        let addAmount = event.target;
        let id = addAmount.dataset.id;
        let tempItem = cart.find((item) => item.id === id);
        tempItem.amount = tempItem.amount + 1;
        Storage.saveCart(cart);
        this.setCartValues(cart);
        addAmount.nextElementSibling.innerText = tempItem.amount;
      } else if (event.target.classList.contains('fa-chevron-down')) {
        let lowerAmount = event.target;
        let id = lowerAmount.dataset.id;
        let tempItem = cart.find((item) => item.id === id);
        tempItem.amount = tempItem.amount - 1;
        if (tempItem.amount > 0) {
          Storage.saveCart(cart);
          this.setCartValues(cart);
          lowerAmount.previousElementSibling.innerText = tempItem.amount;
        } else {
          cartContent.removeChild(lowerAmount.parentElement.parentElement);
          this.removeItem(id);
        }
      }
    });
  }

  clearCart() {
    let cartItems = cart.map((item) => item.id);
    cartItems.forEach((id) => this.removeItem(id));
    console.log(cartContent.children);
    while (cartContent.children.length > 0) {
      cartContent.removeChild(cartContent.children[0]);
    }
    this.hideCart();
  } // end of clearCart

  removeItem(id) {
    cart = cart.filter((item) => item.id !== id);
    this.setCartValues(cart);
    Storage.saveCart(cart);
    let button = this.getSingleButton(id);
    button.disabled = false;
    button.innerHTML = `<i class="fas fa-shopping-cart"></i>add to cart`;
  } // end of removeItem

  getSingleButton(id) {
    return buttonsDOM.find((button) => button.dataset.id === id);
  }
} // end of UI class

// local storage
class Storage {
  static saveProducts(products) {
    localStorage.setItem('products', JSON.stringify(products));
  } // end of saveProducts
  static getProduct(id) {
    let products = JSON.parse(localStorage.getItem('products'));
    return products.find((product) => product.id === id);
  } // end of getProduct
  static saveCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
  } // end of saveCart
  static getCart() {
    return localStorage.getItem('cart')
      ? JSON.parse(localStorage.getItem('cart'))
      : [];
  }
}

checkoutBtn.addEventListener('click', () => {
  document.getElementById('checkout-info').value = localStorage.getItem('cart');
}); // end of click event listener

document.addEventListener('DOMContentLoaded', () => {
  const ui = new UI();
  const products = new Products();
  //setup app
  ui.setupApp();
  // get all products
  products
    .getProducts()
    .then((products) => {
      ui.displayProducts(products);
      Storage.saveProducts(products);
    })
    .then(() => {
      ui.getBagButtons();
      ui.cartLogic();
    });
}); // end of DOMContentLoaded event listener
