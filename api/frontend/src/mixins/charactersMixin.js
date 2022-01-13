export var charactersMixin = {
    data: function() {
        return {
            color: ''
        }
    },
    methods: {
        getElementBorderColor(element) {
            if (element == "Geo") {
                this.color = "2px solid #e0ba4f";
            }
            if (element == "Hydro") {
                this.color = "2px solid #04e3fc";
            }
            if (element == "Cryo") {
                this.color = "2px solid #97edf3";
            }
            if (element == "Pyro") {
                this.color = "2px solid #f08445";
            }
            if (element == "Dendro") {
                this.color = "2px solid #dfbafc";
            }
            if (element == "Electro") {
                this.color = "2px solid #dfbafc";
            }
            if (element == "Anemo") {
                this.color = "2px solid #95ecc2";
            }

        },
    }
}