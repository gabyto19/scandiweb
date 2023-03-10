Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      products: [],
      deleteIds: [],
    };
  },
  methods: {
    updateDeleteIds(event, id) {
      if (event.target.checked) {
        this.deleteIds.push(id);
      } else {
        const index = this.deleteIds.indexOf(id);
        if (index !== -1) {
          this.deleteIds.splice(index, 1);
        }
      }
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
