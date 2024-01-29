-- CREATE DATABASE IF NOT EXISTS lifefile;
USE room_911;
select *  from departments;
SELECT * FROM users;
SELECT * FROM records;

SELECT u.department_id, d.name, count(*) as total
FROM users u JOIN departments d ON u.department_id = d.id
GROUP BY department_id;

SELECT DATE(last_login_at) FROM users WHERE DATE(last_login_at) = (SELECT DATE(MAX(last_login_at)) FROM users);
SELECT DATE(created_at) FROM records WHERE DATE(created_at) = (SELECT DATE(MAX(created_at)) FROM records);

SELECT DATE(lasT_login_at), DATE(min(lasT_login_at)), DATE(max(lasT_login_at))
FROM users
ORDER BY last_login_at DESC;
-- limit 1;

DELETE
FROM users
WHERE id > 45;

WITH cte as (
SELECT u.name, u.department_id, r.status, count(status) AS Total
FROM records r
JOIN users u ON u.id = r.user_id
GROUP BY u.name, r.status
ORDER BY u.name, r.status, total DESC)
SELECT d.name, ct.name, ct.status, ct.Total
FROM cte ct JOIN departments d ON d.id = ct.department_id;

-- Alter

ALTER TABLE nashville ADD COLUMN `PropertyCity` VARCHAR(255) AFTER PropertyAddress2;
UPDATE nashville SET PropertyCity = SUBSTRING_INDEX(PropertyAddress, ',', -1);

-- Update
UPDATE nashville as a, (SELECT * FROM update_address) AS New_Address
SET a.PropertyAddress = New_address.address
WHERE a.UniqueId = New_address.UniqueId;


-- View
CREATE VIEW percentPopulationVaccinates AS SELECT 
    dea.continent,
    dea.location,
    dea.date,
    dea.population,
    vac.new_vaccinations,
    SUM(vac.new_vaccinations) OVER(PARTITION BY dea.location ORDER BY dea.location, dea.date) as RollingPeople
FROM
    coviddeaths dea
        JOIN
    covidvaccinations vac ON dea.location = vac.location
        AND dea.date = vac.date
WHERE
    dea.continent != '';

--  cte

WITH PopvsVac (continent, location, date, population, new_vaccinations, RollingPeople)
AS
(
SELECT 
    dea.continent,
    dea.location,
    dea.date,
    dea.population,
    vac.new_vaccinations,
    SUM(vac.new_vaccinations) OVER(PARTITION BY dea.location ORDER BY dea.location, dea.date) as RollingPeople
FROM
    coviddeaths dea
        JOIN
    covidvaccinations vac ON dea.location = vac.location
        AND dea.date = vac.date
WHERE
    dea.continent != ''
)
SELECT * , (RollingPeople/Population) * 100 as 'PopvsVac'
FROM PopvsVac
ORDER BY 2, 3;