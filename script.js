let totalAmount = 0;

function addToSidebar(service, amount) {
  const ul = document.getElementById("selectedServices");
  const li = document.createElement("li");
  li.innerHTML = `${service} - $${amount} <span class="remove" onclick="removeFromSidebar(this, ${amount})">x</span>`;
  ul.appendChild(li);

  totalAmount += amount;
  document.getElementById("totalAmount").textContent = totalAmount;
}

function removeFromSidebar(element, amount) {
  const li = element.parentNode;
  li.remove();

  totalAmount -= amount;
  document.getElementById("totalAmount").textContent = totalAmount;
}

function openCheckoutModal() {
  document.getElementById("checkoutModal").classList.remove("hidden");
  document.getElementById("checkoutModal").style.display = "flex"; // Ensure it displays as flex
}

function closeCheckoutModal() {
  document.getElementById("checkoutModal").classList.add("hidden");
  document.getElementById("checkoutModal").style.display = "none"; // Ensure it hides
}

function selectContact(name) {
  document.getElementById("searchContact").value = name;
  document.getElementById("contactList").innerHTML = "";
}

function finishCheckout() {
  alert("Checkout finished!");
  closeCheckoutModal();
}
