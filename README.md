# 🎓 Sistema de Gestión de Instituciones

Sistema web modular para la gestión de usuarios, instituciones y colegios usando:

- 💻 Backend: Laravel 10
- 🔒 Autenticación con JWT
- 📦 API RESTful

---

## 🚀 Requisitos

Antes de comenzar, asegúrate de tener instalado:

| Herramienta        | Versión recomendada |
|--------------------|---------------------|
| 🐘 PHP             | >= 8.1              |
| 🧬 Composer        | >= 2.5              |
| 🐬 MySQL o MariaDB | >= 5.7 / 10.2       |
| 📦 Node.js         | >= 18.x             |
| 🧶 Yarn/NPM        | >= 7.x              |

---

## 🛠️ Instalación

### 🔙 Backend (Laravel)

```bash
# 1. Clonar repositorio
git clone https://github.com/dyeyo/backtest.git
cd tu_repo/backend

# 2. Instalar dependencias
composer install

# 3. Copiar .env y configurar
cp .env.example .env
php artisan key:generate

# 4. Configura tu base de datos en el archivo .env

# 5. Migrar y hacer seed
php artisan migrate --seed

# 6. Correr servidor local
php artisan serve
