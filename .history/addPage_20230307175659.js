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
    submitForm() {
      // Create a FormData object containing the form data
      const formData = new FormData();
      formData.append("sku", this.sku);
      formData.append("name", this.name);
      formData.append("price", this.price);
      formData.append("productType", this.selectedProductType);
      formData.append("size", this.size);
      formData.append("weight", this.weight);
      formData.append("height", this.height);
      formData.append("width", this.width);
      formData.append("length", this.length);

      // Send a POST request to the server with the form data
      axios
        .post("insert-product.php", formData)
        .then((response) => {
          console.log(response.data);
          alert("Product added successfully!");
        })
        .catch((error) => {
          console.log(error);
          alert(
            "An error occurred while adding the product. Please try again."
          );
        });
    },
    clearIt()
    {
      this.sku= "";
      this.name= "";
      this.price= "";
      this.selectedProductType= "dvd";
      this.size= "";
      this.weight= "";
      this.height= "";
      this.width= "";
      this.length= "";
      console.log("done!!!");
    }
  },
}).mount("#app");
