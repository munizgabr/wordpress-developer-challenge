# Deploy

Baixe o repositório dentro de uma instalação wordpress. Certifique-se de que, se houver uma pasta wp-content antes de baixar o repo, renomeie para wp-content_old.

Crie uma página chamada Home e acesse configurações>leitura e defina esta página como principal.

## Plugin

Ative o plugin Advanced Custom Field PRO pelo painel administrativo.

### Teste
Adicione as categorias na taxonomia personalizada "Categoria do vídeo". Recomendo que seja Filme(slug:filme), Série(slug: serie) e Documentário(slug: documentario). Não se esqueça de preencher a descrição das categorias, pois ela será útil na Archive.

Acesse o custom post type 'Video' e cadastre o conteúdo. Na seção "Embed do vídeo" cadastre apenas o link do embed que fica dentro do atributo src do iframe.
### Como buildar o SASS

Instale o sass com o comando ```npm install -g sass```
Após instalado, rode o comando abaixo a partir da raiz do tema, ou seja, dentro de wp-content/themes/desafio-wp-gabriel/
```sass assets/sass/global.scss:build/css/global.css```
