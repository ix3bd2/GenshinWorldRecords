export var charactersMixin = {
    data() {
        return {}
    },
    methods: {
        getElementBorderColor(element) {
            if (element == "Geo") {
                return "2px solid #e0ba4f";
            }
            if (element == "Hydro") {
                return "2px solid #04e3fc";
            }
            if (element == "Cryo") {
                return "2px solid #97edf3";
            }
            if (element == "Pyro") {
                return "2px solid #f08445";
            }
            if (element == "Dendro") {
                return "2px solid #dfbafc";
            }
            if (element == "Electro") {
                return "2px solid #dfbafc";
            }
            if (element == "Anemo") {
                return "2px solid #95ecc2";
            }

        },
        getElementColor(element) {
            if (element == "Geo") {
                return "#e0ba4f";
            }
            if (element == "Hydro") {
                return "#04e3fc";
            }
            if (element == "Cryo") {
                return "#97edf3";
            }
            if (element == "Pyro") {
                return "#f08445";
            }
            if (element == "Dendro") {
                return "#dfbafc";
            }
            if (element == "Electro") {
                return "#dfbafc";
            }
            if (element == "Anemo") {
                return "#95ecc2";
            }

        },
    }
}