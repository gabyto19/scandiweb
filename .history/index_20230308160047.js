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
    deleteProduct() {
      // Get all the checkboxes that are checked
      const checkboxes = document.querySelectorAll(".delete-checkbox:checked");

      // Loop through the checkboxes and get the SKU of each product that needs to be deleted
      // Loop through the checkboxes and get the SKU of each product that needs to be deleted
      const skus = [];
      checkboxes.forEach((checkbox) => {
        const sku = checkbox.getAttribute('data-sku');
        skus.push(sku);
      });

      // Send an AJAX request to the PHP file to delete the products
      axios
        .post("delete_product.php", { skus })
        .then((response) => {
          // If the request is successful, remove the deleted products from the Vue data array
          this.products = this.products.filter(
            (product) => !skus.includes(product.sku)
          );
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
