# Desafio Revvo - Plataforma de Cursos

Plataforma de cursos online desenvolvida como parte do processo seletivo da Revvo, com funcionalidades completas de CRUD para cursos e slideshow.

## 👨‍💻 Desenvolvedor

**Flávio Lopes de Araújo**

Realizei o deploy do projeto aqui => [Link do projeto](http://rcs8ko0w44cwk4kc4g8c00k4.5.161.118.156.sslip.io/)

- GitHub: [@FlavioAraujo23](https://github.com/FlavioAraujo23)
- LinkedIn: [Flávio Araújo](https://linkedin.com/in/flavio23)
- Email: flaviolopes1027@gmail.com

## 🚀 Sobre o Projeto

Sistema web responsivo para gerenciamento de cursos online com as seguintes funcionalidades:

### ✨ Funcionalidades

- **CRUD de Cursos**: Criar, editar, visualizar e excluir cursos
- **CRUD de Slides**: Gerenciar slideshow da página inicial
- **Upload de Imagens**: Sistema de upload para cursos e slides
- **Modal de Boas-vindas**: Exibido apenas no primeiro acesso
- **Design Responsivo**: Adaptável a diferentes dispositivos

### 🛠️ Tecnologias

- **Backend**: PHP puro (sem frameworks)
- **Frontend**: HTML5, CSS3, JavaScript vanilla
- **Banco**: MySQL com MySQLi
- **Extras**: Font Awesome, Toastify.js

## ⚙️ Configuração

1. **Clone o repositório**

```bash
git clone https://github.com/FlavioAraujo23/desafio_revvo.git
```

2. **Configure o banco (config.env)**

```ini
host=localhost
port=3306
db=desafio_revvo
user=seu_usuario
pass=sua_senha
```

3. **Crie as tabelas**

```sql
CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    descricao TEXT,
    link VARCHAR(255),
    imagem VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE slides (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    descricao TEXT,
    link VARCHAR(255),
    imagem VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

4. **Defina permissões**

```bash
chmod 755 cursos/uploads slides/uploads
```

## 📋 Requisitos Atendidos

- ✅ PHP puro (sem frameworks)
- ✅ CRUD completo para cursos e slides
- ✅ Sistema de upload de imagens
- ✅ Modal de primeiro acesso com localStorage
- ✅ Layout responsivo baseado no design fornecido
- ✅ Grid adaptativo para diferentes resoluções

---

_Desenvolvido para o processo seletivo Revvo - 2025_
