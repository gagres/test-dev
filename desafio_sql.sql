SELECT CONCAT(c.nome, ' ', c.sobrenome),
        c.data_nascimento,
        casa.cor as casa,
        carro.modelo as carro,
        bairro.nome as bairro
FROM cliente c
LEFT JOIN casa
    ON casa.fk_cliente = c.id_cliente
LEFT JOIN carro
    ON carro.fk_cliente = c.id_cliente
LEFT JOIN bairro
    ON bairro.id_bairro = casa.fk_bairro
