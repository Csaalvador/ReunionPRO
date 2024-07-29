[![Logotipo-Avant-Fiscal-Horizontal-2.png](https://i.postimg.cc/JnSjmqgk/Logotipo-Avant-Fiscal-Horizontal-2.png)](https://postimg.cc/R6QWLcvS)

# Desafio Técnico: Sistema de Reserva de Salas de Reunião

## Descrição
Este desafio técnico consiste em desenvolver um sistema de reserva de salas de reunião para uma empresa, utilizando PHP puro e MySQL. O sistema deve permitir que os usuários se registrem e façam login, e que os administradores gerenciem as salas de reunião. Usuários autenticados devem poder visualizar a disponibilidade das salas e fazer reservas.

**Requisitos:**
- **PHP Puro:** Não utilize frameworks de PHP.
- **Conexão com Banco de Dados:** A conexão com o banco de dados será fornecida pela Avant Fiscal, portanto, o candidato deve se preocupar apenas com o código.

**Opcional:**
- **Arquitetura Separada:** Criar o Backend separado do Frontend.
- **Frontend:**
  - Utilizar JavaScript e jQuery para funcionalidades dinâmicas.
  - Para estilização, utilizar Bootstrap ou TailwindCSS.
  - Não utilizar frameworks de frontend. O desenvolvimento do frontend deve ser feito apenas com PHP, HTML, JavaScript e os estilos mencionados acima.

Esta abordagem assegura um código mais enxuto e um melhor entendimento das tecnologias envolvidas, sem a complexidade adicional de frameworks.


## Funcionalidades
Esse desafio precisa obrigatoriamente implementar essas funcionalidades abaixo, fique a vontade para adicionar mais funcionalidades que agregem ao projeto sem mudar o objetivo principal da aplicação.


- **Cadastro de Usuários**
  - Registro de novos usuários.
  - Login de usuários existentes.
  - Diferentes níveis de acesso (administrador e usuário comum).

- **Gerenciamento de Salas**
  - Administradores podem criar, atualizar e excluir salas de reunião.
  - Informações das salas incluem nome, capacidade e localização.

- **Reserva de Salas**
  - Usuários podem visualizar a disponibilidade das salas.
  - Usuários podem fazer reservas especificando sala, data, hora de início e término.

- **Validações**
  - Campos obrigatórios devem ser preenchidos.
  - Verificação de unicidade de email.
  - Garantia de que uma sala não pode ser reservada por mais de um usuário no mesmo horário.

- **Segurança**
  - Proteção contra SQL Injection.
  - Acesso às páginas de gerenciamento restrito a usuários autenticados.

## Estrutura Sugerida do Banco de Dados
(Fique livre para criar sua estrutura com outras tabelas caso ache necessario).

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    access_level ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    capacity INT NOT NULL,
    location VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT NOT NULL,
    user_id INT NOT NULL,
    start_time DATETIME NOT NULL,
    end_time DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

## Entrega do projeto
- Faça um fork do projeto.
- Crie uma nova branch com o seu nome e sobrenome ex: joao-souza: git checkout -b nome-sobrenome.
- Faça commit das suas alterações: git commit -m 'Minha nova feature'.
- Faça push para a branch: git push origin nome-sobrenome.
- Abra um Pull Request.

Claro, aqui está uma versão expandida e detalhada da documentação:

---

# Documentação do Sistema de Gestão de Reservas para Reuniões

## Visão Geral

O Sistema de Gestão de Reservas para Reuniões é uma aplicação web projetada para facilitar a administração e o gerenciamento de salas de reunião em um ambiente corporativo. Desenvolvido em PHP com suporte a MySQL, o sistema oferece uma interface intuitiva e funcional para usuários e administradores, permitindo o agendamento e gerenciamento eficiente de reservas.

## Funcionalidades

### Login e Registro

- **Registro de Usuário**: Usuários novos podem criar uma conta utilizando o formulário de registro. Após o preenchimento bem-sucedido do formulário e a validação dos dados, a conta será criada e o usuário poderá acessar o sistema com suas credenciais.
- **Login Seguro**: O sistema implementa uma política de segurança robusta. Caso um usuário tente acessar o sistema com credenciais incorretas três vezes consecutivas, a conta será temporariamente bloqueada por 30 segundos para prevenir ataques de força bruta.

### Gerenciamento de Reservas

- **Agendamento de Salas**: Usuários podem reservar salas especificando a data e o horário de início e término da reserva.
- **Visualização de Reservas**: Os usuários têm acesso a uma visualização de suas reservas ativas e anteriores.

### Administração

- **Gerenciamento de Salas**: Administradores podem adicionar, editar e remover salas disponíveis para reserva.
- **Gerenciamento de Usuários**: Administradores têm a capacidade de adicionar, editar e remover usuários do sistema. Eles também podem promover usuários comuns a administradores.
- **Painel Administrativo**: O painel administrativo fornece uma visão abrangente das reservas realizadas. Administradores podem visualizar todas as reservas, tanto ativas quanto concluídas, e realizar ações de gerenciamento conforme necessário.

## Estrutura do Banco de Dados

O banco de dados é composto pelas seguintes tabelas:

### Tabela `users`
Armazena informações dos usuários, incluindo:
- `id`: Identificador único do usuário.
- `name`: Nome completo do usuário.
- `email`: Endereço de e-mail do usuário.
- `password`: Senha criptografada do usuário.
- `access_level`: Nível de acesso do usuário (`user` ou `admin`).
- `created_at`: Data e hora de criação do registro.

### Tabela `rooms`
Armazena informações sobre as salas, incluindo:
- `id`: Identificador único da sala.
- `name`: Nome da sala.
- `created_at`: Data e hora de criação do registro.

### Tabela `reservations`
Armazena os detalhes das reservas realizadas, incluindo:
- `id`: Identificador único da reserva.
- `room_id`: Identificador da sala reservada.
- `user_id`: Identificador do usuário que fez a reserva.
- `start_time`: Data e hora de início da reserva.
- `end_time`: Data e hora de término da reserva.
- `created_at`: Data e hora de criação do registro.

### Tabela `login_attempts`
Armazena informações sobre tentativas de login, incluindo:
- `ip`: Endereço IP do usuário.
- `attempts`: Número de tentativas de login.
- `last_attempt`: Data e hora da última tentativa.

## Instalação e Configuração

### Requisitos

- **PHP**: Versão 7.4 ou superior.
- **MySQL**: Versão 5.7 ou superior.
- **Servidor Web**: Apache, Nginx ou outro servidor compatível.

### Passos para Instalação

1. **Clonar o Repositório**

   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositorio
   ```

2. **Configurar o Banco de Dados**

   - Crie um banco de dados no MySQL:

     ```sql
     CREATE DATABASE reunionPro;
     ```

   - Importe o esquema do banco de dados a partir do arquivo SQL fornecido.

3. **Configurar o Projeto**

   - Edite o arquivo `conexao.php` com as informações do banco de dados:

     ```php
     <?php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'reunionPro');
     define('DB_USER', 'seu-usuario');
     define('DB_PASS', 'sua-senha');
     ?>
     ```

4. **Iniciar o Servidor**

   - Configure seu servidor web para apontar para a pasta do projeto.
   - Certifique-se de que o módulo `mod_rewrite` está habilitado, se estiver utilizando Apache.

## Utilização

### Login e Registro

O sistema oferece duas opções para acessar a plataforma:
- **Registro**: Usuários novos devem preencher o formulário de registro para criar uma conta. Após a validação e criação da conta, o usuário poderá acessar o sistema.
- **Login**: Usuários existentes devem fornecer suas credenciais para fazer login. O sistema bloqueia a conta após três tentativas de login incorretas, por um período de 30 segundos, para prevenir ataques de força bruta.

### Segurança

O sistema adota medidas rigorosas de segurança:
- **Validações de Entrada**: Diversas validações são realizadas para garantir a integridade dos dados.
- **Administração Inicial**: O primeiro administrador deve ser ativado manualmente no banco de dados. Após essa configuração, o administrador pode criar e gerenciar novos usuários e administradores.
- **Permissões de Usuário**: Usuários comuns podem visualizar e realizar reservas. Administradores têm permissões adicionais, incluindo gerenciamento de salas e usuários, além de acesso ao painel administrativo para monitoramento de reservas.

---

db
USE reunionPro;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    access_level ENUM('user', 'admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT NOT NULL,
    user_id INT NOT NULL,
    start_time DATETIME NOT NULL,
    end_time DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE login_attempts (
    ip VARCHAR(45) NOT NULL PRIMARY KEY,
    attempts INT NOT NULL,
    last_attempt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


