schema([id, nome, descricao, telefone, logo, fotos, media_votos]).
fds([ [[id],[nome, descricao, telefone, logo, fotos, media_votos]] ]).
answer(K) :- schema(R),fds(F),candkey(R,F,K). 
