{ pkgs }: {
	deps = [
   		pkgs.sqlite
		pkgs.php80
		pkgs.phpExtensions.pdo
		pkgs.phpExtensions.pdo_sqlite
	];
}
