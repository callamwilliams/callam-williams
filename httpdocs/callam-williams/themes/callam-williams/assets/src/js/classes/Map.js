// @flow

// MARK: Types
type Marker = {
    lat: number;
    lng: number;
    image: string;
    animation: string;
}
type Markers = Array<Marker>;
type Options = {[key: string]: any};
type Params = {[key: string]: string};

class Map {

    // MARK: Properties
    element: HTMLElement | null = null;
    markers: Markers = [];
    map: Object;
    options: Options;
    defaults: Options;

    // MARK: Constructor
    constructor(id: string = `google-map`, options: Options, markers: Markers = []): void {

        this.element = document.getElementById(id);
        this.markers = markers;
        this.options = {
            ...this.defaults,
            ...options
        };

        this.element && this._setMap();
    }

    // MARK: Static Methods
    static downloadScript(params: Params): void {

        const script: HTMLScriptElement = document.createElement(`script`);

        script.type = `text/javascript`;
        script.src = `https://maps.googleapis.com/maps/api/js${Map.paramsToString(params)}`;
        script.id = `js-google-script`;

        if (!document.body) return;

        document.body.appendChild(script);

    }

    static paramsToString(params: Params): string {

        let paramArray: Array<string> = [];

        for(let param in params) {
            if(params.hasOwnProperty(param)) {
                paramArray.push(`${param}=${params[param]}`);
            }
        }

        return `?${paramArray.join('&')}`;
    }

    // MARK: "Private" Methods
    _setMap(): void {

        const bounds: Object = new google.maps.LatLngBounds();

        this.map = new google.maps.Map(this.element, this.options);

        for(let i = 0; i < this.markers.length; i++) {

            let pos = new google.maps.LatLng(this.markers[i].lat, this.markers[i].lng);

            new google.maps.Marker({
                position: pos,
                map: this.map,
                icon: new google.maps.MarkerImage(this.markers[i].image),
                animation: google.maps.Animation[this.markers[i].animation]
            });

            bounds.extend(pos);
        }

        this.map.setCenter(bounds.getCenter());
    }
}

export default Map;