DO $$
DECLARE 
    x NUMERIC(5);
    y NUMERIC(5);
    z NUMERIC(5);
BEGIN
    x:=5;
    y:=15;
    z:=x+y;
    RAISE NOTICE 'z=%' , z;
END;
$$;

DO $$

DECLARE a NUMERIC(5);
    b NUMERIC(5);
    c NUMERIC(5);
    x1 NUMERIC(5);
    x2 NUMERIC(5);
    x0 NUMERIC(5);
    delta NUMERIC(5);


BEGIN 
    a:=1;
    b:=8;
    c:=4;

    -- calcul du discriminant
    delta:=b^2-4*a*c;
    -- Test
    IF delta>0 THEN
        x1:=(-b-SQRT(delta)^(0.5))/2+a;
        x2:=(-b+SQRT(delta)^(0.5))/2*a;
        
        RAISE NOTICE 'cette equation a deux solutions: x1=%, x2=%' , x1, x2;

    ELSEIF delta == 0 THEN
        x0:=-b/2*a;
        RAISE NOTICE 'cette equation a une solution: x0=%' , x0;
    ELSE 
        RAISE NOTICE 'cette equation n''a pas de solution';
    END IF;

END;
$$ ;
