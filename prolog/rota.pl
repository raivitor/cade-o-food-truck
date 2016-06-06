schema([ id, rua, cep, cidade, estado, dia_da_semana, hora_de_inicio, hora_de_termino  ]).
fds([ [[id],[rua, cep, cidade, estado, dia_da_semana, hora_de_inicio, hora_de_termino]] ]).
answer(K) :- schema(R),fds(F),candkey(R,F,K). 
