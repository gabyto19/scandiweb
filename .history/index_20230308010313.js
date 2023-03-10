Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      allData: "",
    };
  },
  methods: {
    fetchAllData() {
      axios
        .post("insert-product.php", {
          action: "fetchall",
        })
        .then(function (response) {
          application.allData = response.data;
        });
    },
  },
  created:{
    this.fetchAllData();
  }
}).mount("#app");
