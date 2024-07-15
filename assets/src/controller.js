import {Controller} from "@hotwired/stimulus";
import {Loader} from "@googlemaps/js-api-loader"

export default class extends Controller {

    static values = {
        loaderOptions: Object,
        mapOptions: Object,
        markers: Array // markers are optional
    }

    /**
     * Function to load and render google maps and markers when they are available.
     * @param {Loader} loader from @googlemaps/js-api-loader
     * @returns {Promise<void>}
     */
    async loadMap(loader) {
        const {Map} = await loader.importLibrary("maps");
        const {AdvancedMarkerElement} = await loader.importLibrary("marker");

        // Create Map instance set it to the element which load this stimulus controller.
        const map = new Map(this.element, this.mapOptionsValue);

        // Set marker if markers are provided with markersValue
        if (this.hasMarkersValue) {
            this.markersValue.forEach((marker) => {
                new AdvancedMarkerElement({
                    map,
                    position: marker.position,
                    title: marker.title
                });
            });
        }

    }

    connect() {
        const loader = new Loader(this.loaderOptionsValue);
        this.loadMap(loader);
    }
}