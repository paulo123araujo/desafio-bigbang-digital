# Desafio Backend - BigBang Digital

  > A descrição do desafio se encontra [aqui](https://gitlab.com/bigbangdigital/desafio-back-end)

### How did I think

A princípio vou dar um start num projeto laravel/lumen e aplicar alguns conceitos mesclados de padrões de desenvolvimento, juntamente com algumas boas práticas

### How to run

Pra rodar o projeto, tenha em sua máquina o **docker** e o **docker-compose** instalado para poder subir o container.

Um detalhe bastante importante é que precisará colocar as variáveis de ambiente pra funcionar o projeto. Na raiz do projeto terá um arquivo **.env.example**, use ele como base para criar o arquivo **.env**, que é onde o projeto busca essas variáveis

Subir projeto:

```bash
$ docker-compose up -d --build
```

Rodar testes:
```bash
$ ./src/vendor/bin/phpunit
```

Rodar analise estática do código:
```bash
$ ./src/vendor/bin/phpcs --standard=PSR12 app/ tests/