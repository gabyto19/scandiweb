Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      products: [],
      selectedProducts: [],
    };
  },
  methods: {
    deleteProducts() {
      axios.post('delete_products.php', {
        selectedProducts: this.selectedProducts
      })
      .then((response) => {
        console.log(response.data);
        alert("successfully!" + selectedProducts);
      })
      .catch((error) => {
        console.log(error);
        alert(
          "An error occurred while adding the product. Please try again."
        );
      });

    }
    
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
