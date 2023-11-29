@echo off
setlocal enabledelayedexpansion

set "directory=C:\xampp\htdocs\Evangelism-email-marketing--PHP\assets\images\flags"
set "outputFile=output.txt"

if not exist "%directory%" (
    echo Directory not found.
    exit /b
)

cd /d "%directory%"

if exist "%outputFile%" del "%outputFile%"

for %%F in (*.png) do (
    echo %%F>>"%outputFile%"
)

echo File names have been saved to %outputFile%.

endlocal