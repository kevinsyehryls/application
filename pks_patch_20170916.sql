drop table if exists `tb_months`;
create table tb_months(
       nomor int,
       bulan varchar(50)
);
delete from `tb_months`;
insert into tb_months (nomor, bulan)
values (1,'January'), (2,'February'), (3,'March'), (4,'April'), (5,'May'), (6,'June'),
(7,'July'), (8,'August'), (9,'September'), (10,'October'), (11,'November'), (12,'December');

drop view if exists vw_rekap_pks_monthly;
create view vw_rekap_pks_monthly as
select
date_format(p.`start_date`, '%M %Y') 'bulan',
count(p.`id_pks`) as jml
from `tb_pks` p group by 1;

drop view if exists vw_seri_pks_monthly;
create view vw_seri_pks_monthly as
select m.nomor, concat(m.`bulan`, ' ', date_format(now(), '%Y')) as bulans
from `tb_months` m order by m.`nomor` asc;

drop view if exists vw_chart_rekap_pks;
create view vw_chart_rekap_pks as
select s.`bulans`, COALESCE(v.`jml`, 0) as jml
from `vw_rekap_pks_monthly` v
right join `vw_seri_pks_monthly` s on v.`bulan` = s.`bulans`
order by s.`nomor`;
