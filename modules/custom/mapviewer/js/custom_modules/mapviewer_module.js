/* Styles de la carte pour Openlayers */
export let blueStyle = [
    new ol.style.Style({
        /* Les points seront des puces bleues (une image) */
        image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
            anchor: [12.5, 39],
            anchorXUnits: 'pixels',
            anchorYUnits: 'pixels',
            opacity: 0.90,
            src: 'https://unpkg.com/leaflet@1.0.1/dist/images/marker-icon.png'
        }),
        /* Les traits, en bleu un peu épais */
        stroke: new ol.style.Stroke({
            lineCap: 'round',
            color: 'rgba(3, 85, 145, 0.7)',
            width: 5
        }),
        /* Couleur de remplissage */
        fill: new ol.style.Fill({
            color: [61, 96, 152, 0.5]
        }),
        zIndex: 10
    }),
    new ol.style.Style({
        image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
            anchor: [12.5, 39],
            anchorXUnits: 'pixels',
            anchorYUnits: 'pixels',
            opacity: 0.90,
            src: 'https://unpkg.com/leaflet@1.0.1/dist/images/marker-shadow.png'
        }),
        zIndex: 9
    })
]

export let redStyle = [
    new ol.style.Style({
        /* Les points seront des puces bleues (une image) */
        image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
            anchor: [12.5, 39],
            anchorXUnits: 'pixels',
            anchorYUnits: 'pixels',
            opacity: 0.90,
            src: 'https://unpkg.com/leaflet@1.0.1/dist/images/marker-icon.png'
        }),
        /* Les traits, en bleu un peu épais */
        stroke: new ol.style.Stroke({
            lineCap: 'round',
            color: 'rgba(220, 90, 90, 0.7)',
            width: 5
        }),
        /* Couleur de remplissage */
        fill: new ol.style.Fill({
            color: [220, 90, 90, 0.5]
        }),
        zIndex: 10
    }),
    new ol.style.Style({
        image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
            anchor: [12.5, 39],
            anchorXUnits: 'pixels',
            anchorYUnits: 'pixels',
            opacity: 0.90,
            src: 'https://unpkg.com/leaflet@1.0.1/dist/images/marker-shadow.png'
        }),
        zIndex: 9
    })
]

export let circleStyle = [
    new ol.style.Style({
    image: new ol.style.Circle({
        radius: 4,
        fill: new ol.style.Fill({
            color: 'blue'
        }),
        stroke: new ol.style.Stroke({
            color: [255, 255, 255],
            width: 1
        })
    })
})]

export let configobjects = [{
    code: "stcarhyce",
    label: "Stations carhyce",
    style: circleStyle
}]

export let testnumber = 12