Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      selectedProductType: "dvd",
      size: "",
      weight: "",
      height: "",
      width: "",
      length: "",
    };
  },
  methods: {
    async submitForm() {
      // Check if all required fields are filled
      if (this.sku === "" || this.name === "" || this.price === "") {
        alert("Please submit required data");
      } else if (this.selectedProductType === "dvd" && this.size === "") {
        alert("Please submit required data");
      } else if (this.selectedProductType === "book" && this.weight === "") {
        alert("Please submit required data");
      } else if (
        this.selectedProductType === "furniture" &&
        (this.height === "" || this.width === "" || this.length === "")
      ) {
        alert("Please submit required data");
      }
    },
  },
}).mount("#app");
