# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.3.0]

### Changed

- Expand GoogleMap model with new disableDefaultUI property.
  The default ui can be deactivated. ([#2](https://github.com/Wild-Siena/google-maps-bundle/issues/2))

## [0.2.0] 2024-07-15

### Added

- AdvancedMarkerElement to set some markers on the map. ([#1](https://github.com/Wild-Siena/google-maps-bundle/issues/1))
- New models LatLng, Marker. ([#1](https://github.com/Wild-Siena/google-maps-bundle/issues/1))

### Changed

- Models GoogleMap, LoaderOptions, MapOptions. ([#1](https://github.com/Wild-Siena/google-maps-bundle/issues/1))

## [0.1.0] 2024-07-05

### Added

- GoogleMaps Model, LoaderOptions Model, MapOptions Model to generate options for @googlemaps/js-api-loader
- Stimulus controller that is responsible for loading and rendering Google Maps.
- Twig extension to create a twig function for rendering Google Maps.
