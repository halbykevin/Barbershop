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
