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
      debugger
      const selectedProducts = this.selectedProducts[1];
      axios
        .post("delete_products.php", {
          selectedProducts,
        })
        .then((response) => {
          console.log(this.selectedProducts);
          // handle success response
          console.log(response.data);
          // remove deleted products from the list
          this.products = this.products.filter(
            (product) => !this.selectedProducts.includes(product.id)
          );
          // clear selectedProducts array
          this.selectedProducts = [];
        })
        .catch((error) => {
          // handle error response
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
