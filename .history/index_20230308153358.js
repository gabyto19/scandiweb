Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      products: [],
    };
  },
  methods: {
    deleteProduct(id) {
      axios
        .post("delete_product.php", { id })
        .then((response) => {
          console.log(response.data);
          // Remove the deleted product from the products array
          this.products = this.products.filter((product) => product.id !== id);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    axios
      .get("get_products.php")
      .then((response) => {
        this.products = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
}).mount("#app");

const deleteCheckboxes = document.querySelectorAll('.delete-checkbox');
deleteCheckboxes.forEach(checkbox => {
  checkbox.addEventListener('click', () => {
    // Check if checkbox is checked
    if (checkbox.checked) {
      // Get SKU or ID of product
      const sku = checkbox.parentElement.querySelector('.sku').textContent;
      // Call the deleteProduct method on the Vue instance
      app.deleteProduct(sku);
    }
  });
