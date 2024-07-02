import { Controller } from "@hotwired/stimulus";
import { Loader } from "@googlemaps/js-api-loader"

export default class extends Controller {

    static values = {
        loaderOptions: Object,
        mapOptions: Object
    }

    connect() {
        const loader = new Loader(this.loaderOptionsValue);

        loader
            .importLibrary("maps")
            .then(({Map}) => new Map(this.element, this.mapOptionsValue))
            .catch()
    }
}