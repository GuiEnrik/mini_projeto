{ pkgs }: {
	deps = [
		pkgs.sqlite
		pkgs.php82
		pkgs.phpExtensions.pdo
		pkgs.phpExtensions.pdo_sqlite
	];
}
