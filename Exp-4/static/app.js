// Get the cart items from local storage or create an empty array if it doesn't exist
let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

// Update the cart UI with the current cart items
updateCartUI();

// Function to add an item to the cart
function addToCart(name, price) {
  // Check if the item already exists in the cart
  const existingItem = cartItems.find(item => item.name === name);
  if (existingItem) {
    // If the item already exists, update its quantity
    existingItem.quantity++;
  } else {
    // If the item doesn't exist, add it to the cart
    const newItem = {
      name: name,
      price: price,
      quantity: 1
    };
    cartItems.push(newItem);
  }

  // Save the updated cart items to local storage
  localStorage.setItem("cartItems", JSON.stringify(cartItems));

  // Update the cart UI with the new cart items
  updateCartUI();
}

// Function to update the cart UI with the current cart items
function updateCartUI() {
  const cartList = document.getElementById("cart-items");
  let total = 0;
  cartList.innerHTML = "";
  cartItems.forEach(item => {
    if (item.quantity > 0) { // Show items only if quantity > 0
      const li = document.createElement("li");
      li.innerHTML = `${item.name} - $${item.price} * ${item.quantity}`;

      // Create a new button element for increasing the item quantity
      const increaseButton = document.createElement("button");

      // Set the text content of the button
      increaseButton.textContent = "+";

      // Add a click event listener to the button
      increaseButton.addEventListener("click", () => {
        item.quantity++;
        li.innerHTML = `${item.name} - $${item.price} * ${item.quantity}`;
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
        updateCartUI();
      });

      // Add the button to the list item element
      li.appendChild(increaseButton);

      // Create a new button element for decreasing the item quantity
      const decreaseButton = document.createElement("button");

      // Set the text content of the button
      decreaseButton.textContent = "-";

      // Add a click event listener to the button
      decreaseButton.addEventListener("click", () => {
        item.quantity--;
        if (item.quantity === 0) {
          cartList.removeChild(li);
        } else {
          li.innerHTML = `${item.name} - $${item.price} * ${item.quantity}`;
        }
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
        updateCartUI();
      });

      // Add the button to the list item element
      li.appendChild(decreaseButton);

      cartList.appendChild(li);
      total += item.price * item.quantity;
    }
  });
  document.getElementById("cart-total").textContent = `$${total}`;
}


// Function to clear the cart
function clearCart() {
  // Remove the cart items from local storage
  localStorage.removeItem("cartItems");

  // Reset the cartItems array
  cartItems = [];

  // Update the cart UI
  updateCartUI();
}
