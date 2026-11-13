<#
  Windows helper - same commands as the Makefile.
  Usage:  .\scripts\run.ps1 <command>
  Commands: build | run | stop | up | down | logs | shell | migrate | fresh | clean
#>
param([Parameter(Position = 0)][string]$Command = "help")

$Image = "coolfix-services-webapp"
$Container = "coolfix-standalone"
$Port = if ($env:PORT) { $env:PORT } else { "8000" }

switch ($Command) {
    "build"   { docker build -t $Image . }
    "run"     { docker run -d --name $Container -p "${Port}:80" $Image }
    "stop"    { docker stop $Container; docker rm $Container }
    "up"      { docker compose up -d --build }
    "down"    { docker compose down }
    "logs"    { docker compose logs -f app }
    "shell"   { docker compose exec app bash }
    "migrate" { docker compose exec app php artisan migrate --force }
    "fresh"   { docker compose exec app php artisan migrate:fresh --seed --force }
    "clean"   { docker compose down -v; docker rmi $Image }
    default   {
        Write-Host "Usage: .\scripts\run.ps1 <command>"
        Write-Host "  build    Build the Docker image"
        Write-Host "  run      Run the image alone (SQLite) on http://localhost:$Port"
        Write-Host "  stop     Stop and remove the standalone container"
        Write-Host "  up       Start app + MySQL with Docker Compose"
        Write-Host "  down     Stop the Compose stack"
        Write-Host "  logs     Follow application logs"
        Write-Host "  shell    Open a shell in the app container"
        Write-Host "  migrate  Run migrations"
        Write-Host "  fresh    Reset database with demo data"
        Write-Host "  clean    Remove containers, volumes and image"
    }
}
