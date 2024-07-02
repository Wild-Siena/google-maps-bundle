{
  description = "Flake for google maps bundle";

  inputs = {
    nixpkgs.url = "github:nixos/nixpkgs?ref=nixos-unstable";
    flake-utils.url = "github:numtide/flake-utils";
  };

  outputs = { self, nixpkgs, flake-utils }:
      flake-utils.lib.eachDefaultSystem (system:
          let pkgs = nixpkgs.legacyPackages.${system}; in
          {
            devShells.default = pkgs.mkShellNoCC {
                packages = with pkgs; [ php php82Packages.composer nodejs_22 ];
            };
          }
      );
}
