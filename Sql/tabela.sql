CREATE TABLE usuario (
    id bigserial NOT NULL PRIMARY KEY,
    nome character varying(50),
    cep character varying(8),
    numero_casa character varying(5),
    email character varying(255),
    senha character varying(255)
);

CREATE TABLE fornecedor (
    id bigserial NOT NULL PRIMARY KEY,
    nomefornecedor character varying(50),
    cnpj character varying(14)
);

CREATE TABLE categoria (
    id bigserial NOT NULL PRIMARY KEY,
    nomecategoria character varying(50),
    descricao text
);

CREATE TYPE status AS ENUM ('entregue', 'em andamento', 'enviado', 'cancelado');

CREATE TABLE pedido (
    id bigserial NOT NULL PRIMARY KEY,
    status status,
    data date DEFAULT CURRENT_DATE,
    pedidos text,
    usuario_id integer references usuario(id)
);

CREATE TABLE produto (
    id bigserial NOT NULL PRIMARY KEY,
    img text,
    nome character varying(50),
    preco numeric(12,2),
    fornecedor_id integer references fornecedor(id),
    categoria_id integer references categoria(id)
);

CREATE TABLE review (
    id bigserial NOT NULL PRIMARY KEY,
    avaliacao integer,
    data date DEFAULT CURRENT_DATE,
    descricao text,
    usuario_id integer references usuario(id),
    produto_id integer references produto(id)
);

CREATE TABLE carrinho
(
	id bigserial NOT NULL primary key
	usuario_id integer references usuario(id),
	pedido_id integer references pedido(id)
)

insert into usuario (nome, cep, numero_casa, email, senha)
values ('Marcos Alexandre', '79001000', '1234', 'Marcos@gmail.com', 'UmPatinhoNaLagoa');
insert into usuario (nome, cep, numero_casa, email, senha)
values ('Pablo Ruan', '79001200', '124', 'Pablo@gmail.com', 'Saponaolavaope');
insert into usuario (nome, cep, numero_casa, email, senha)
values ('Jasson Junior', '79331200', '1297', 'Jasson@gmail.com', 'Masquechule')

insert into categoria (nomecategoria, descricao)
values ('Banho', 'Dar banho');
insert into categoria (nomecategoria, descricao)
values ('Conforto', 'Bem Estar do pet');
insert into categoria (nomecategoria, descricao)
values ('Comida', 'Comer');

insert into fornecedor (nomefornecedor, cnpj)
values ('Dr. dog', '23450691827456');
insert into fornecedor (nomefornecedor, cnpj)
values ('Pet clean', '23450691844456');
insert into fornecedor (nomefornecedor, cnpj)
values ('cafuné', '23450634567456');

insert into produto (img, nome, preco, fornecedor_id, categoria_id)
values ('https://images.tcdn.com.br/img/img_prod/1069966/kit_shampoo_condicionador_1_perfume_cachorro_gato_dr_dog_53_1_e6ae20c7c12cf405d18a58e8ad3b8cf4.png', 'Shampoo de cachorro', 50.00, 1, 1);
insert into produto (img, nome, preco, fornecedor_id, categoria_id)
values ('https://static3.tcdn.com.br/img/img_prod/719253/cama_para_cachorro_e_gato_retangular_basic_teo_sarja_microfibra_woof_circus_verde_1721_2_8beb393db33cb8dce272c1ce5a909c1a.png', 'Cama para cachorro', 200.00, 3, 2);
insert into produto (img, nome, preco, fornecedor_id, categoria_id)
values ('https://http2.mlstatic.com/D_NQ_NP_624004-MLB52447871470_112022-W.jpg', 'Pote de comida', 10.00, 2, 3);
insert into produto (img, nome, preco, fornecedor_id, categoria_id)
values ('https://cf.shopee.com.br/file/6611cf0e7404f68036d7636d8a7886b4', 'Coleira para pet', 30.00, 3, 2);

select * from usuario;
select * from fornecedor;
select * from categoria;
select * from produto;
select * from review;
select * from carrinho;

CREATE FUNCTION limpar() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
declare
begin
	delete from pedido
	where usuario_id = old.id;

	delete from review
	where usuario_id = old.id;
	
	return old;
end
$$;

CREATE TRIGGER excluiusuario BEFORE DELETE ON usuario 
FOR EACH ROW EXECUTE FUNCTION limpar();

CREATE FUNCTION limparproduto() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
declare
begin
	delete from review
	where produto_id = old.id;
	
	return old;
end
$$;

CREATE TRIGGER excluiproduto BEFORE DELETE ON produto 
FOR EACH ROW EXECUTE FUNCTION limpar();









